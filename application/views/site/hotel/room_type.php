<!-- rooms section start -->
<div class="content-area rooms-section">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><?php echo $room_type->name; ?></h1>
            <h4>Số lượng: <?php echo $total; ?> phòng</h4>
        </div>
        <div class="row">
            <?php foreach ($list as $row): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="hotel-box">
                    <!--header -->
                    <div class="header clearfix">
                        <a href="<?php echo base_url('hotel/view/'.$row->id); ?>">
                        <img src="<?php echo base_url('upload/hotel_room/'.$row->image_link); ?>" alt="<?php echo $row->name; ?>" class="img-responsive" style="max-height: 175px;">
                        </a>
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <div class="pr" style="padding: 35px 15px;">
                            <?php echo number_format($row->price); ?> VNĐ<sub>/Đêm</sub>
                        </div>
                        <div class="alert alert-<?php if($row->status==2){echo 'info';}elseif($row->status==3){echo 'warning';}else{echo 'danger';} ?>" role="alert" style="text-align: center;">
                            <b style="text-align: center;"><?php if($row->status==2){echo 'Chưa thuê';}elseif($row->status==3){echo 'Bảo trì';}else{echo 'Đã thuê';} ?></b>
                        </div>
                        
                        <h3>
                            <a href="<?php echo base_url('hotel/view/'.$row->id); ?>"><?php echo $row->name; ?></a>
                        </h3>
                        <h5 style="float: right;margin-top: 4px;">Lượt xem: <b><?php echo $row->view; ?></b></h5>
                        <?php foreach ($type_list as $type): ?>
                        <?php if ($type->id==$row->type_id): ?>
                        <h4 style="color: #fa4e3a"><?php echo $type->name; ?></h4>
                        <?php endif ?>
                        <?php endforeach ?>
                        <h5 class="location">
                            <a href="<?php echo base_url('hotel/view/'.$row->id); ?>">
                                <?php 
                                $address=$row->address;
                                foreach ($wards as $ward) {
                                    if($row->wards==$ward->id)
                                    {
                                        $address.=', '.$ward->title;
                                    }
                                }
                                foreach ($provinces as $province) {
                                    if($row->provinces==$province->id)
                                    {
                                        $address.=', '.$province->title;
                                    }
                                }
                                

                                ?>
                                <i class="fa fa-map-marker"></i><?php echo $address; ?>
                            </a>
                        </h5>
                        <p><?php echo $row->intro; ?></p>
                    </div>
                </div>
            </div>  

            <?php endforeach ?>
        </div>

        <div class="text-center">
            <!-- Page navigation start -->
            <nav aria-label="Page navigation">
                
                    <?php echo $this->pagination->create_links(); ?>
               
            </nav>
            <!-- Page navigation end -->
        </div>
    </div>
</div>
<!-- rooms section end -->
