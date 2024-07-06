<?php view('layouts.shared.header') ?>
<div
    class='relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10'>
    <div class='mx-auto max-w-xl'>
        <div class='flex min-h-full flex-col justify-center px-6 py-12 lg:px-8'>
            <div class='mx-auto w-full max-w-xl text-center'>
                <h1 class='block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text'>
                    TruthWhisper</h1>
                <h3 class='text-gray-500 my-2'>Thanks a lot for your submission!</h3>
            </div>

            <div class='mt-10 mx-auto w-full max-w-xl'>
                <img src='<?php asset('img/success.jpg') ?>' alt=''>
            </div>
        </div>
    </div>
</div>
<?php view('layouts.shared.footer') ?>
