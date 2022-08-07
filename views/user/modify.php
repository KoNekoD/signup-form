<?php include_once ROOT . '/views/layouts/header.php'; ?>

<section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md mt-20">
    <h1 class="text-xl font-bold text-white">Редактирование аккаунта</h1>
    <div class="flex flex-col items-center py-1">
<?php if (isset($errors)): for ($i=0; $i < count($errors); $i++):?>
    	<p class="text-center text-lg text-yellow-500 font-bold"><?=$errors[$i]; ?></p>
<?php endfor; endif; ?>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white" for="username">Username</label>
                <input id="username" name="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" value="<?=$profile->username;?>" required>
            </div>

            <div>
                <label class="text-white" for="emailAddress">Email Адрес</label>
                <input id="emailAddress" name="email" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" value="<?=$profile->email;?>">
            </div>

            <div>
                <label class="text-white" for="password">Пароль</label>
                <input id="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" value="<?=$profile->password;?>" required>
            </div>

            <div>
                <label class="text-white" for="pass_c">Подтверждение пароля</label>
                <input id="pass_c" name="pass_c" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" required>
            </div>
            <div>
                <label class="text-white" for="color">Цвет имени</label>
                <input id="color" name="color" type="color" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" value="#f9fafb">
            </div>
            <div>
                <label class="text-white" for="sel">Select</label>
                <select id="sel" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                    <option>Surabaya</option>
                    <option>Jakarta</option>
                    <option>Tangerang</option>
                    <option>Bandung</option>
                </select>
            </div>
            <div>
                <label class="text-white" for="range">Range(подвигай)</label>
                <input id="range" type="range" class="block w-full py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-white" for="date">Дата</label>
                <input id="date" name="date" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" value="<?=$profile->date;?>">
            </div>
            <div>
                <label class="text-white" for="textarea">О себе</label>
                <textarea id="textarea" name="about" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring" value="<?=$profile->about;?>"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-white">
                Аватар
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span class="">Upload a file</span>
                      <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1 text-white">or drag and drop</p>
                  </div>
                  <p class="text-xs text-white">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600" type="submit">Сохранить</button>
        </div>
    </form>
</section>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>