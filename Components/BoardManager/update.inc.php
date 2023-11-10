<div class="col-12 p-5">
    <h2>แก้ไขโพสต์</h2>
    <hr>
    <div class="card col-12 shadow p-5">
        <div class="mb-3 col-12">
            <h4 for="board_title" class="form-label">หัวข้อการประชาสัมพันธ์</h4>
            <input type="text" class="form-control" name="board_title" value="<?php echo $board_data['board_title'] ?>" id="board_title" placeholder="">
        </div>
        <div class="mb-3 col-12">
            <h4 for="" class="form-label">เนื้อหาประชาสัมพันธ์</h4>
            <textarea class="form-control" name="board_detail" id="board_detail" rows="3"><?php echo $board_data['board_detail'] ?></textarea>
        </div>
        <div class="mb-3 col-12">
            <div class="mb-3">
                <label for="img_input" class="form-label">อัปโหลดรูปภาพ</label>
                <input type="file" class="form-control" name="img_input" id="img_input" placeholder="" onchange="_previewImage()">
                <input type="text" class="d-none" value="<?php echo $board_data['board_image'] ?>" id="board_image">
            </div>
        </div>
        <div class="mb-3 col-12">
            <h4>ภาพตัวอย่าง</h4>
            <img src="<?php echo $board_data['board_image'] ?>" alt="" srcset="" id="img_preview">
        </div>
        <hr>
        <div class="mb-3 col-12">
            <button class="btn btn-lg btn-primary ps-5 pe-5 ms-auto" onclick="_handleSubmit()">
                โพสต์
            </button>
        </div>
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
        const id = "<?php echo $board_data['id']?>";

        fetch('Controllers/updateBoardByID.php', {
                header: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify({
                    id,
                    board_title,
                    board_detail,
                    board_image,
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);
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
</script>