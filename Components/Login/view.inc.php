<div class="col-12 h-100vh bg-success-50 d-flex justify-content-center">
    <div class="container position-absolute bottom-25 p-0">
        <h1 class="text-center">NTC อุ่นใจ Backoffice</h1>
        <div class="col-12 d-flex justify-content-center">
            <div class="col-6">
                <hr>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group mb-3">
                <h4 class="text-center">Username</h4>
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-6">
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <h4 class="text-center">Password</h4>
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-6">
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-5 mb-3">
                <button class="btn btn-lg btn-success" onclick="_handleSubmit()">เข้าสู่ระบบ</button>
            </div>
        </div>
    </div>
</div>

<script>
    function _handleSubmit(params) {
        const username = getEle('#username').value
        const password = getEle('#password').value

        fetch('Controllers/getUserLoginBy.php', {
            headers: {
                "Accept": 'application/json',
                "Content-Type": 'application/json'
            },
            method: "POST",
            body: JSON.stringify({
                username,
                password
            })
        })
        .then(res=>res.json())
        .then(data=>{
            console.log();
            if (data) {
                window.location.reload()
            } else {
                getEle('#errorPage').classList.remove('d-none')
            }
        })

    }
</script>