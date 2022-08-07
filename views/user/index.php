<?php include_once ROOT . '/views/layouts/header.php'; ?>

<section class="text-blue-200 bg-green-700 px-32 py-8">
   <div class="container px-5 mx-auto flex bg-green-600 bg-opacity-75 rounded-sm flex-wrap">

      <div id="app" class="flex-grow mx-4">
          <div class="flex justify-center">
              <div class="container flex justify-center py-8">
                  <?php require_once ROOT . '/views/user/login.php'; ?>
              </div>
          </div>
      </div>
      <div class="flex-grow mx-4">
         <?php require_once ROOT . '/views/user/register.php'; ?>
      </div>
   </div>
</section>

    <script>
        const app = new Vue({
            el: '#app',
            data: {
                errors: [],
                username: null,
                password: null,
                email: null,
                pass_c: null,
                action: null,
            },
            methods: {
                checkForm: function (e) {

                    console.log(this.action);
                    axios.post("/login/", {
                        firstName: 'Fred',
                        lastName: 'Flintstone'
                    })
                        .then(function (response) {
                            console.log(response);
                            document.write(response.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                    e.preventDefault();
                }

            },
            checkForm2: function (e) {
                console.log(this.action);
                axios.post("/register/", {
                    firstName: 'Fred',
                    lastName: 'Flintstone'
                })
                    .then(function (response) {
                        console.log(response);
                        document.write(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                e.preventDefault();
            }

        }
        })
    </script>
<?php include_once ROOT . '/views/layouts/footer.php'; ?>