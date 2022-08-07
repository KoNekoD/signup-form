<?php include_once ROOT . '/views/layouts/header.php'; ?>

<section class="text-blue-200 body-font bg-green-700">
   <div class="container px-5 py-8 mx-auto flex justify-center">
      <div class="bg-indigo-600 shadow overflow-hidden sm:rounded-lg w-9/12">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-50">
            Информация о профиле
          </h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-200">
            Просмотр и изменение персональных данных.
          </p>
        </div>
        <div class="border-t border-gray-700">
          <dl>
            <div class="flex items-center">

               <div class="flex-grow border-l border-gray-700">
                  <div class="bg-indigo-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                      Имя
                    </dt>
                    <dd class="mt-1 text-sm text-gray-200 sm:mt-0 sm:col-span-2">
                      <?=$profile->username; ?>
                    </dd>
                  </div>
                  <div class="border-t border-indigo-500 bg-indigo-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                      Пароль
                    </dt>
                    <dd class="mt-1 text-sm text-gray-200 sm:mt-0 sm:col-span-2">
                      <?=$profile->password; ?>
                    </dd>
                  </div>
                  <div class="border-t border-indigo-500 bg-indigo-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                      Ваш email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-200 sm:mt-0 sm:col-span-2">
                      <?=$profile->email; ?>
                    </dd>
                  </div>
                  <div class="border-t border-indigo-500 bg-indigo-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                      Должность
                    </dt>
                    <dd class="mt-1 text-sm text-gray-200 sm:mt-0 sm:col-span-2">
                      <?=$profile->role;?>
                    </dd>
                  </div>
               </div>
            </div>

            <div class="bg-indigo-600 border-t border-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-50">
                О себе
              </dt>
              <dd class="mt-1 text-sm text-gray-200 sm:mt-0 sm:col-span-2">
                <?=$profile->about;?>
              </dd>
            </div>
            <div class="bg-indigo-600 px-4 py-5 sm:px-6 flex justify-end">
              <dd class="mt-1 text-sm text-gray-200 sm:mt-0 py-5">
                <a class="p-4 border border-2 border-red-500 rounded-lg text-red-500 mx-1 bg-gray-600 bg-opacity-40 transition-colors duration-300 hover:bg-gray-700 hover:bg-opacity-60" href="/account/delete/">Удалить аккаунт</a>
              </dd>
            </div>
          </dl>
        </div>
      </div>
   </div>
</section>



<?php include_once ROOT . '/views/layouts/footer.php'; ?>