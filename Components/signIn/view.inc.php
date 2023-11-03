<div class="col-12">
    <div class="col-12 pt-5 text-center">
        <img src="Templates\assets\imgs\user.png" class="col-1" alt="" srcset="">
        <h1 class="text-center mt-3">
            <strong>
                เข้าสู่ระบบ
            </strong>
        </h1>
        <form class="col-12" action="" method="post" id="loginForm">
            <div class="col-12 row justify-content-center">
                <div class="form-group col-6">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control mt-3">
                </div>
            </div>
            <div class="col-12 row justify-content-center">
                <div class="col-6">
                    <hr>
                </div>
            </div>
            <div class="col-12 row justify-content-center">
                <div class="formgroup col-6">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-success mt-5">เข้าสู่ระบบ</button>
        </form>
    </div>
</div>

<script>
    var form = document.querySelector("#loginForm");

    function handleForm(event) {
        event.preventDefault();
        const username = document.querySelector('#username').value
        const password = document.querySelector('#password').value
        fetch('./Controllers/getUserLoginBy.php', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    username,
                    password
                })
            }).then(res => res.json())
            .then(data => {
                // console.log(data);
                if(data.length == 0){
                    alert('เกิดข้อผิดพลาดในการเข้าสู่ระบบกรุณาลองอีกครั้ง')
                }else{
                    window.location.href = '?'
                }
            })
            .catch(e=>alert('เกิดข้อผิดพลาดในการเข้าสู่ระบบกรุณาลองอีกครั้ง'))
    }
    form.addEventListener('submit', handleForm);
</script>