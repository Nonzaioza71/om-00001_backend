<?php $data = $user_model->getUserByID($_GET['user_id']);

if (count($data) > 0) {
$user_data = $data[0];
?>
    <div class="col-12 pb-5">
        <div class="col-12 row gap-5 p-5 justify-content-center">
            <div class="col-12 text-center">
                <img src="Templates\assets\imgs\user.png" alt="" srcset="" style="width:256px; height:256px;">
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="col-8">
                    <h1>บัญชี</h1>
                    <hr>
                    <h2 class="col-12">
                        <input class="form-control fs-2" type="text" value="<?php echo $user_data['user_prefix'] ?>" id="user_prefix">
                        <input class="form-control fs-2" type="text" value="<?php echo $user_data['user_name'] ?>" id="user_name">
                        <input class="form-control fs-2" type="text" value="<?php echo $user_data['user_lastname'] ?>" id="user_lastname">
                    </h2>

                    <h3 class="text-secondary mt-5">
                        รหัสบัตรประชาชน : <input class="form-control fs-3" type="text" value="<?php echo $user_data['user_national_card'] ?>" id="user_national_card" />
                    </h3>
                    <h3 class="text-secondary">
                        วัน/เดือน/ปี เกิด :
                        <input class="form-control mt-3 fs-3" type="text" value="<?php echo $user_data['user_birthday'] ?>" name="user_birthday" id="user_birthday" onClick="document.querySelector('#datepicker').showPicker()">
                    </h3>
                    <h4 class="text-secondary mt-5">เป็นสมาชิกเมื่อ : <?php echo $user_data['add_date'] ?></h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('input').forEach(item=>{
            item.setAttribute('readOnly', true)
        })
    </script>

    <?php require_once(__DIR__ . '/modal.inc.php'); ?>

<?php } else { ?>
    <div class="card col-12 h-100vh fixed-top" id="doctorRequestModal">
        <div class="card-body position-absolute w-100 bottom-50 justify-content-center">
            <div class="text-center">
                <img id="icon" src="Templates\assets\imgs\close.png" alt="" srcset="" style="width:128px; height:128px;" class="mb-5">
                <h1 id="msg">ไม่พบผู้ใช้งานรายนี้อยู่ในระบบ</h1>
                <button class="btn btn-lg btn-success" onclick="window.location.href = '?app=Accounts'">
                    <h1>รับทราบ</h1>
                </button>
            </div>
        </div>
    </div>
<?php } ?>
