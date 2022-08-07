<?php include_once ROOT . '/views/layouts/header.php'; ?>
<div class="flex justify-center">
   <div class="container flex justify-center py-8">
       <form class="w-full max-w-sm p-4 bg-green-800 rounded-md" method="POST" @submit="checkForm">
           <h3 class="text-3xl font-normal text-center leading-normal mt-0 mb-2 font-serif text-blue-100">
               Вход
           </h3>

           <div class="md:flex md:items-center mb-6">
               <div class="md:w-1/3">
                   <label class="block text-blue-100 font-bold md:text-right mb-1 md:mb-0 pr-4">
                       Username
                   </label>
               </div>
               <div class="md:w-2/3">
                   <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="your username" name="username" required v-model="username">
               </div>
           </div>
           <div class="md:flex md:items-center mb-6">
               <div class="md:w-1/3">
                   <label class="block text-blue-100 font-bold md:text-right mb-1 md:mb-0 pr-4">
                       Password
                   </label>
               </div>
               <div class="md:w-2/3">
                   <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="password" placeholder="******************" name="password" required v-model="password    ">
               </div>
           </div>
           <div class="md:flex md:items-center">
               <div class="md:w-1/3"></div>
               <div class="md:w-2/3">
                   <button class="shadow bg-green-600 opacity-80 hover:bg-opacity-50 hover:border-purple-500 border border-gray-500 text-blue-50 font-bold py-2 px-4 rounded" type="submit">
                       Войти
                   </button>
               </div>
           </div>
       </form>
   </div>
</div>

<?php include_once ROOT . '/views/layouts/footer.php'; ?>