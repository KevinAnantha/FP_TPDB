<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {

        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-39EHCbHC1UVK41DmO2_Ji6Y8', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('admin/M_edit');

    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

	public function pesan($no_kamar, $lantai, $harga, $id_kmr){
		if ($this->session->userdata('username')) {
		    $id_penghuni = $this->session->userdata('id_user');
		    $isDataFilled = $this->M_edit->checkDataFilled($id_penghuni);
		    if ($isDataFilled) {
                $id_user = $this->session->userdata('id_user');
    			$data_user = $this->M_edit->select_user($id_user);
    			foreach($data_user as $row){
    				$data['email'] = $row->email;
    				$data['no_telp'] = $row->no_telp;
    			}
    			$data['id_kmr'] = $id_kmr;
    			$data['no_kmr'] = $no_kamar;
    			$data['lantai'] = $lantai;
    			$data['harga'] = $harga;
    			$this->load->view('Utama/Detail_bayar', $data);
            } else {
                // Redirect ke halaman profile jika data belum terisi semua
                $this->session->set_flashdata('error', 'Lengkapi data Anda sebelum melakukan transaksi!');
                redirect(base_url('profile/edit_user'));
            }
			
		}else{
			redirect(base_url('login'));
		}
	}

    public function token()
    {

		$periode = $this->input->post('periode');
		$nomor_kamar = $this->input->post('nomor_kamar');
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$harga = $this->input->post('harga');
		$no_telp = $this->input->post('no_telp');
		$email = $this->input->post('email');
		$jml_byr = $periode*$harga;

		
		// Required
		$kode_depan = "KOS";
		$kode_belakang = "M";
		$transaction_details = array(
		  'order_id' => $kode_depan . uniqid() . $kode_belakang,
		  'gross_amount' => $jml_byr, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $harga,
		  'quantity' => $periode,
		  'name' => "Bulan - Booking Kamar Kost"
		);

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 50000,
		//   'quantity' => 1,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// // Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		
		$customer_details = array(
		  'first_name'    => $username,
		  'last name'     => $id_user,
		  'email'         => $email,
		  'phone'         => $no_telp
		//   'billing_address'  => $billing_address,
		//   'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'hours', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish($id_kmr)
    {
    	$result = json_decode($this->input->post('result_data'), true);
    	// echo 'RESULT <br><pre>';
    	// var_dump($result);
    	// echo '</pre>' ;
		$id_pengguna = $this->session->userdata('id_user');

		if($result['status_code'] == 200){
			$status_sewa = "aktif";
		}elseif ($result['status_code'] == 201){
			$status_sewa = "Booking in Progress";
		}elseif ($result['status_code'] == 202){
			$status_sewa = "expired";
		}

		$data_transaksi = [
			'order_id' => $result['order_id'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => $result['va_numbers'][0]["bank"],
			'va_number' => $result['va_numbers'][0]["va_number"],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code'],
			'id_penghuni' => $id_pengguna,
			'id_kmr' => $id_kmr,
			'status_sewa' => $status_sewa

		];

		$simpan = $this->db->insert('penyewaan', $data_transaksi);



		if($simpan){
		    $data_update = [
				'id_penghuni' => $id_pengguna
			];
		    $this->db->update('kamar', $data_update, array('id_kmr' => $id_kmr));
			redirect(base_url('Profile/history/' . $id_pengguna));
		}else{
			echo "gagal";
		}


    }
}
