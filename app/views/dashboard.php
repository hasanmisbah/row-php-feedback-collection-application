<?php view('layouts.shared.header') ?>
<div class='relative max-w-7xl mx-auto'>
    <div class='flex justify-end'>
        <span class='block text-gray-600 font-mono border border-gray-400 rounded-xl px-2 py-1'>Your feedback form link: <strong><?php echo $user_url ?></strong></span>
    </div>
    <h1 class='text-xl text-indigo-800 text-bold my-10'>Received feedback</h1>
    <?php if (empty($feedbacks)) : ?>
        <div class='flex items-center justify-center'>
            <p class='text-gray-500'>No feedback received yet!</p>
        </div>
    <?php endif; ?>
    <div class='grid grid-cols-1 gap-4 sm:grid-cols-3'>
        <?php foreach ($feedbacks as $feedback) : ?>
            <div
                class='relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400'>
                <div class='focus:outline-none'>
                    <p class='text-gray-500'><?= $feedback['feedback'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php view('layouts.shared.footer') ?>


