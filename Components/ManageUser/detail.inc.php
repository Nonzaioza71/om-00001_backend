<?php 
$user_data = $user_model->getUserByID($_GET['idx'])[0];
$user_data['user_image'] = 'Templates\assets\imgs\\' . $user_data['user_role'] . '_' . $user_data['user_gender'] . '.png'; 
?>
<div class="col-12 mt-5 mb-5 p-5 card">
    <h1 class="text-center mb-3">รายละเอียดบัญชี</h1>
    <hr>
    <div class="col-12 mb-3">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-3">
                <img src="<?php echo $user_data['user_image'] ?>" class="w-100" alt="" srcset="">
            </div>
        </div>
        <div class="form-group mb-5">
            <h3>คำนำหน้าชื่อ-ชื่อจริง-นามสกุล</h3>
            <div class="col-12 d-flex">
                <div class="col-2">
                    <input type="text" value="<?php echo $user_data['user_prefix'] ?>" name="user_prefix" id="user_prefix" class="form-control">
                </div>
                <div class="col-5">
                    <input type="text" value="<?php echo $user_data['user_name'] ?>" name="user_name" id="user_name" class="form-control">
                </div>
                <div class="col-5">
                    <input type="text" value="<?php echo $user_data['user_lastname'] ?>" name="user_lastname" id="user_lastname" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group mb-5">
            <h3>เพศ</h3>
            <div class="col-12 d-flex">
                <div class="col-12">
                    <select type="text" name="user_gender" id="user_gender" class="form-select">
                        <option value="male" <?php if($user_data['user_gender'] == 'male') echo 'selected' ?>>ชาย</option>
                        <option value="female" <?php if($user_data['user_gender'] == 'female') echo 'selected' ?>>หญิง</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group mb-5">
            <h3>วัน/เดือน/ปี เกิด</h3>
            <input type="date" value="<?php echo $user_data['user_birthday']?>" name="user_birthday" id="user_birthday" class="form-control">
        </div>
        <div class="form-group mb-5">
            <h3>รหัสบัตรประชาชน</h3>
            <input type="text" value="<?php echo $user_data['user_national_card'] ?>" name="user_national_card" id="user_national_card" class="form-control">
        </div>
        <input type="text" class="d-none" id="user_id" value="<?php echo $_GET['idx'] ?>">
    </div>
</div>
