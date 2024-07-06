<?php view('layouts.shared.header') ?>
    <div
        class='relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10'>
        <div class='mx-auto max-w-xl'>
            <div class='flex min-h-full flex-col justify-center px-6 py-12 lg:px-8'>
                <div class='mx-auto w-full max-w-xl text-center px-24'>
                    <h1 class='block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text'>
                        TruthWhisper</h1>
                </div>

                <div class='mt-10 mx-auto w-full max-w-xl'>
                    <form class='space-y-6' action='#' method='POST'>
                        <div>
                            <label for='email' class='block text-sm font-medium leading-6 text-gray-900'>Email
                                address</label>
                            <div class='mt-2'>
                                <input id='email' name='email' type='email' autocomplete='email' required
                                       class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'>
                            </div>
                        </div>

                        <div>
                            <div class='flex items-center justify-between'>
                                <label for='password' class='block text-sm font-medium leading-6 text-gray-900'>Password</label>
                                <div class='text-sm'>
                                    <a href='#' class='font-semibold text-indigo-600 hover:text-indigo-500'>Forgot
                                        password?</a>
                                </div>
                            </div>
                            <div class='mt-2'>
                                <input id='password' name='password' type='password' autocomplete='current-password'
                                       required
                                       class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'>
                            </div>
                        </div>

                        <div>
                            <button type='submit'
                                    class='flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'>
                                Sign in
                            </button>
                        </div>
                    </form>

                    <p class='mt-10 text-center text-sm text-gray-500'>
                        Not a member?
                        <a href='/register'
                           class='font-semibold leading-6 text-indigo-600 hover:text-indigo-500'>Register now!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php view('layouts.shared.footer') ?>
