<?php view('layouts.shared.header') ?>
        <div
            class='relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10'>
            <div class='mx-auto max-w-xl'>
                <div class='flex min-h-full flex-col justify-center px-6 py-12 lg:px-8'>
                    <div class='mx-auto w-full max-w-xl text-center'>
                        <h1 class='block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text'>
                            TruthWhisper</h1>
                        <h3 class='text-gray-500 my-2'>Want to ask something or share a feedback to <?php  echo $user['name'] ?? '' ?>?</h3>
                    </div>

                    <div class='mt-10 mx-auto w-full max-w-xl'>
                        <form class='space-y-6' action='/feedback/<?php echo $user['user_id'] ?>' method='POST'>
                            <div>
                                <label for='feedback' class='block text-sm font-medium leading-6 text-gray-900'>Don't
                                    hesitate, just do it!</label>
                                <div class="mt-2">
                                    <textarea required name="feedback" id="feedback" cols="30" rows="10"
                                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php view('layouts.shared.footer') ?>
