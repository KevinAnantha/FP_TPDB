                    <div class="row">
                    <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>History <b>Pemesanan</b></h2>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order_id</th>
                                            <th>Nominal</th>
                                            <th>Mode Pembayaran</th>
                                            <th>Waktu Transaksi</th>
                                            <th>Bank</th>
                                            <th>VA Number</th>
                                            <th>Status</th>
                                            <th>id kamar</th>
                                            <th>id penghuni</th>
                                            <th>Status Sewa</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $row2) {?>
                                            <tr>
                                                <td><?php echo $row2->order_id; ?></td>
                                                
                                                <td>Rp. <?php echo number_format($row2->gross_amount, 0, ',', '.'); ?></td>
                                                <td><?php echo $row2->payment_type; ?></td>
                                                <td><?php echo $row2->transaction_time; ?></td>
                                                <td><?php echo $row2->bank; ?></td>
                                                <td><?php echo $row2->va_number; ?></td>
                                                <td class="text-center">
                                                    <?php 
                                                    if($row2->status_code == "200"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-success" style="color:white;">Berhasil</a>
                                                    <?php }elseif($row2->status_code == "202"){ ?>
                                                    <a style="pointer-events: none; color:white;" class="btn btn-danger" style="color:white;">Gagal</a>
                                                    <?php }else { ?>
                                                        <a style="pointer-events: none; color : white;" class="btn btn-warning">Pending</a>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row2->id_kmr; ?></td>
                                                <td><?php echo $row2->id_penghuni; ?></td>
                                                <td class="text-center">
                                                    <?php 
                                                    if($row2->status_sewa == "aktif"){ ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-success" style="color:white;">Aktif</a>
                                                    <?php } elseif($row2->status_sewa == "Booking in Progress"){ ?>
                                                    <a style="pointer-events: none; color:white;" class="btn btn-warning" style="color:white;">Booking...</a>
                                                    <?php }else { ?>
                                                        <a style="pointer-events: none; color:white;" class="btn btn-danger" href="<?php echo $row2->pdf_url; ?>">Expired</a>
                                                    <?php } ?>
                                                </td>


                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
              
                            
                    </div>
