<?php require base_path('views/partials/head.php') ;?>
<?php require base_path('views/partials/nav.php') ;?>
<?php require base_path('views/partials/banner.php') ;?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">


                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                        <div class="col-span-full">

                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                            <div class="mt-1">
                                <textarea id="body" name="body" rows="3"
                                    class="mt-1 px-5 pt-3 block w-full rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Here's an idea for a note..."><?= $_POST['body'] ? $_POST['body'] : '' ?> </textarea>

                                <?php if (isset($errors['body'])) : ?>

                                <p class="text-red-500 text-xs mt-2">
                                    <?= $errors['body'];?>
                                </p>

                                <?php endif ;?>
                            </div>

                        </div>

                    </div>
                    <div class=" px-4 py-3 text-right sm:px-6">

                        <button type="submit"
                            class="inline-flex justify-center rounded-md border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Submit</button>

                    </div>
                </div>
        </form>
    </div>


</main>


<?php require base_path('views/partials/footer.php');?>