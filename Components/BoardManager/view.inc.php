<div class="col-12 pt-5">
    <div class="col-12">
        <h1>ตั้งค่าการประชาสัมพันธ์</h1>
        <hr>
    </div>
    <div class="col-12">
        <div class="card col-12 shadow p-5">
            <div class="mb-3 col-12">
                <h4 for="board_title" class="form-label">หัวข้อการประชาสัมพันธ์</h4>
                <input type="text" class="form-control" name="board_title" id="board_title" placeholder="">
            </div>
            <div class="mb-3 col-12">
                <h4 for="" class="form-label">เนื้อหาประชาสัมพันธ์</h4>
                <textarea class="form-control" name="board_detail" id="board_detail" rows="3"></textarea>
            </div>
            <div class="mb-3 col-12">
                <div class="mb-3">
                    <label for="img_input" class="form-label">อัปโหลดรูปภาพ</label>
                    <input type="file" class="form-control" name="img_input" id="img_input" placeholder="" onchange="_previewImage()">
                    <input type="text" class="d-none" id="board_image">
                </div>
            </div>
            <div class="mb-3 col-12">
                <h4>ภาพตัวอย่าง</h4>
                <img src="" alt="" srcset="" id="img_preview">
            </div>
            <hr>
            <div class="mb-3 col-12">
                <button class="btn btn-lg btn-primary ps-5 pe-5 ms-auto" onclick="_handleSubmit()">
                    โพสต์
                </button>
            </div>
        </div>
        <?php for ($i=0; $i < count($boards_list); $i++) { $item = $boards_list[$i] ?> 
            <div class="col-12 card shadow mt-1 p-5">
                <h3><?php echo $item['board_title'] ?></h3>
                <hr>
                <pre><?php echo $item['board_detail'] ?></pre>
                <div class="col-12 row justify-content-center">
                    <div class="container">
                        <?php if((strlen($item['board_image'])) > 0) {?>
                            <img src="<?php echo $item['board_image'] ?>" class="w-100" alt="" srcset="">
                        <?php }?>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <hr>
                    <button class="btn btn-primary" onclick="window.location.href = '?app=BoardManager&view=update&id=<?php echo $item['id']?>'">แก้ไข</button>
                    <button class="btn btn-danger" onclick="_handleDeleteBoard(<?php echo $item['id']?>)">ลบ</button>
                    <p class="mb-0 mt-3">อัปโหลดเมื่อ : <?php echo $item['add_date']?></p>
                    <p class="mb-0">แก้ไขล่าสุดเมื่อ : <?php echo $item['update_date']?></p>
                    <p class="mb-0">ความคิดเห็น : <?php echo $item['comments_count']?></p>
                </div>
            </div>
        <?php }?>
    </div>
</div>

<script>
    function _previewImage() {
        const fileInput = document.querySelector('#img_input').files[0]
        const reader = new FileReader()
        reader.readAsDataURL(fileInput)
        reader.onload = () => {
            document.querySelector('#img_preview').setAttribute('src', reader.result)
            document.querySelector('#board_image').value = reader.result
        }
    }

    function _handleSubmit() {
        const board_title = document.querySelector('#board_title').value
        const board_detail = document.querySelector('#board_detail').value
        const board_image = document.querySelector('#board_image').value

        fetch('Controllers/insertBoardBy.php', {
                header: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify({
                    board_title,
                    board_detail,
                    board_image,
                })
            })
            .then(res => res.json())
            .then(data => {
                // console.log(data);
                if (data) {
                    alert("ดำเนินการเสร็จสิน!")
                    window.location.reload()
                } else {
                    alert("เกิดข้อผิดพลาด!")
                    window.location.reload()
                }
            })
            .catch(e => {
                alert("เกิดข้อผิดพลาด!")
                console.log(e)
            })
    }

    function _handleDeleteBoard(id){
        const _confirm = confirm("คุณต้องการที่จะลบโพสต์นี้จริงหรือไม่?")
        if(_confirm){
            fetch('Controllers/deleteBoardByID.php', {
                header: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify({
                    board_id: id
                })
            })
            .then(res => res.json())
            .then(data => {
                // console.log(data);
                if (data) {
                    alert("ดำเนินการเสร็จสิน!")
                    window.location.reload()
                } else {
                    alert("เกิดข้อผิดพลาด!")
                    window.location.reload()
                }
            })
            .catch(e => {
                alert("เกิดข้อผิดพลาด!")
                console.log(e)
            })
        }
    }
</script>