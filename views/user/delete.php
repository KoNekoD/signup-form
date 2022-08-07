<?php include_once ROOT . '/views/layouts/header.php'; ?>
<div class="container flex justify-center py-8">
      <form class="w-full max-w-sm p-4 bg-green-800 rounded-md" method="POST" action="/account/delete/">
      	<input type="text" name="delete-account-marker" value='KONO DIO DA' class="hidden">
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-2/3">
            <label class="block text-blue-100 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-username">
              Удалить аккаунт
            </label>
          </div>
          <div class="md:w-1/3">
            <button class="p-4 border border-2 border-red-500 rounded-lg text-red-500 mx-1 bg-gray-600 bg-opacity-40 transition-colors duration-300 hover:bg-gray-700 hover:bg-opacity-60" href="/account/delete/">Я ухожу</button>
          </div>
        </div>
      </form>
   </div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>