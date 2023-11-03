<div class="col-12">
    <div class="container pt-5">
        <h1>Dashboard</h1>
        <hr>
        <div class="col-12 row gap-1 justify-content-center">
            <div class="col-5 border border-1 rounded shadow bg-success-50 p-4">
                <h1>
                    ยอดผู้เข้าชม <?php echo $users_view_count?>
                </h1>
            </div>
            <div class="col-5 border border-1 rounded shadow bg-info-50 p-4">
                <h1>
                    จำนวนสมาชิก <?php echo $users_count?>
                </h1>
            </div>
        </div>
        <div class="col-12 row gap-1 justify-content-center">
            <div class="col-5 border border-1 rounded shadow bg-success-50 p-4">
                <h1> เข้าชมล่าสุดเมื่อ </h1>
                <h3 class="text-secondary"> <?php echo $user_rating[$users_view_count-1]['view_date']?> </h3>
            </div>
            <div class="col-5 border border-1 rounded shadow bg-info-50 p-4">
                <h1> ลงทะเบียนล่าสุดเมื่อ </h1>
                <h3 class="text-secondary"> <?php echo $users[$users_count-1]['add_date']?> </h3>
            </div>
        </div>
        <hr>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-lg btn-info" onclick="window.location.reload()">Reload</button>
        </div>
    </div>
</div>