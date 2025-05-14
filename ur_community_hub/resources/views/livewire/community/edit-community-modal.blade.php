    <!-- Edit Community Modal -->
    <div wire:ignore.self id="edit-community-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Community
                    </h3>
                    <button type="button" wire:click="resetInputFields"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-community-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 md:p-5">
                    <form wire:submit.prevent="update">
                        <div class="space-y-4">
                            <!-- Community Name -->
                            <div>
                                <label for="edit_community_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Community
                                    Name</label>
                                <input type="text" wire:model="community_name" id="edit_community_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="edit_email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" wire:model="email" id="edit_email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="edit_phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="text" wire:model="phone" id="edit_phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <!-- Profile Image -->
                            <div>
                                <label for="edit_profile_image"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                    Image</label>
                                <input type="file" wire:model="profile_image" id="edit_profile_image"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                @if ($profile_image)
                                    <img src="{{ $profile_image->temporaryUrl() }}" class="w-20 h-20 mt-2 rounded-lg">
                                @elseif ($tempImage)
                                    <img src="{{ $tempImage }}" class="w-20 h-20 mt-2 rounded-lg">
                                @endif
                            </div>

                            <!-- Bio -->
                            <div>
                                <label for="edit_bio"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                                <textarea wire:model="bio" id="edit_bio"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="edit_description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea wire:model="description" id="edit_description"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="edit_location"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                <input type="text" wire:model="location" id="edit_location"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <!-- Facebook Links -->
                            <div>
                                <label for="edit_facebook_links"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                                    Link</label>
                                <input type="url" wire:model="facebook_links" id="edit_facebook_links"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <!-- LinkedIn Links -->
                            <div>
                                <label for="edit_linkedin_links"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn
                                    Link</label>
                                <input type="url" wire:model="linkedin_links" id="edit_linkedin_links"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <!-- Instagram Links -->
                            <div>
                                <label for="edit_instagram_links"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram
                                    Link</label>
                                <input type="url" wire:model="instagram_links" id="edit_instagram_links"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <!-- Twitter Links -->
                            <div>
                                <label for="edit_twitter_links"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter
                                    Link</label>
                                <input type="url" wire:model="twitter_links" id="edit_twitter_links"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center justify-end pt-4 space-x-4">
                            <button type="button" wire:click="resetInputFields"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                data-modal-hide="edit-community-modal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
