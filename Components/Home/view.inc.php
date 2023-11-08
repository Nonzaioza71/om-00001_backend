<div class="col-12 overflow-auto">
    <div class="container pt-5">
        <h1>Dashboard</h1>
        <hr>
        <div class="col-12">
            <h2>สถิติด้านผู้ใช้งาน</h2>
            <div class="col-12 row gap-1 justify-content-center">
                <div class="col-5 border border-1 rounded shadow bg-success-50 p-4">
                    <h4>
                        ยอดผู้เข้าชม <?php echo $users_view_count?>
                    </h4>
                </div>
                <div class="col-5 border border-1 rounded shadow bg-info-50 p-4">
                    <h4>
                        จำนวนสมาชิก <?php echo $users_count?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-12 row gap-1 justify-content-center">
            <div class="col-5 border border-1 rounded shadow bg-success-50 p-4">
                <h4> เข้าชมล่าสุดเมื่อ </h4>
                <h6 class="text-secondary"> <?php echo $user_rating[$users_view_count-1]['view_date']?> </h6>
            </div>
            <div class="col-5 border border-1 rounded shadow bg-info-50 p-4">
                <h4> ลงทะเบียนล่าสุดเมื่อ </h4>
                <h6 class="text-secondary"> <?php echo $users[$users_count-1]['add_date']?> </h6>
            </div>
        </div>
        <div class="col-12 mt-3 mb-3">
            <h2>สถิติด้านการประเมิน</h2>
            <div class="col-12">
                <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>หัวข้อ</th>
                            <th>คะแนนเฉลี่ย(1-5)</th>
                        </tr>
                    <?php for ($i=0; $i < count($estimate_list); $i++) { ?>
                        <tr>
                            <td> <?php echo $i+1 ?> </td>
                            <td> <?php echo $estimate_list[$i]['estimate_title'] ?> </td>
                            <td> <?php echo $estimate_list[$i]['raw_score'] / count($users_estimated_list) ?> </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
        <hr>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-lg btn-info" onclick="window.location.reload()">Reload</button>
        </div>
    </div>
</div>