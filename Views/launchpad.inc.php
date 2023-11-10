<?php
$menuList = [];
$menuList['logined'] = [];
$menuList['logined'][] = array('src' => "Templates\assets\imgs\house.png", 'name' => "หน้าหลัก", 'route' => '?');
$menuList['logined'][] = array('src' => "Templates\assets\imgs\corkboard.png", 'name' => "ตั้งค่าการประชาสัมพันธ์", 'route' => '?app=BoardManager');
$menuList['logined'][] = array('src' => "Templates\assets\imgs\contract.png", 'name' => "ตั้งค่าแบบประเมิน", 'route' => '?app=Estimate');
$menuList['logined'][] = array('src' => "Templates\assets\imgs\user.png", 'name' => "ตั้งค่าบัญชีผู้ใช้งาน", 'route' => '?app=Accounts');
$menuList['logined'][] = array('src' => "Templates\assets\imgs\log-out.png", 'name' => "ออกจากระบบ", 'route' => '?app=Logout');

$menuList['noLogin'] = [];
$menuList['noLogin'][] = array('src' => "Templates\assets\imgs\import.png", 'name' => "เข้าสู่ระบบ", 'route' => '?app=signIn');
?>

<div class="col-12 overflow-hidden">
    <div class="list-group col-12 h-100vh card rounded-0">
        <?php for ($i=0; $i < count($menuList['logined']); $i++) { ?>
            <div 
                class="list-group-item list-group-item-action list-group-item-light cursor-pointer" 
                onclick="window.location.href = '<?php echo $menuList['logined'][$i]['route']?>'"
            >
                <h4><?php echo $menuList['logined'][$i]['name']?></h4>
            </div>
        <?php }?>
    </div>
</div>
