<!-- Add Community Modal -->
<div wire:ignore.self id="add-community-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative w-full max-w-2xl max-h-full p-4">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Add Community
            </h3>
            <button type="button" wire:click="resetInputFields"
                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="add-community-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 space-y-4 md:p-5">
            <form wire:submit.prevent="store">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label for="community_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Community Status</label>
                        <select wire:model.defer="community_status" id="community_status" class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <option value="">-- Select Status --</option>
                            <option value="association">Association</option>
                            <option value="club">Club</option>
                        </select>
                        @error('community_status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <!-- Community Name -->
                    <div>
                        <label for="community_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Community
                            Name</label>
                        <input type="text" wire:model.defer="community_name" id="community_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                        @error('community_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" wire:model.defer="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" wire:model.defer="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Profile Image -->
                    <div>
                        <label for="profile_image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                            Image(Logo)</label>
                        <input type="file" wire:model="profile_image" id="profile_image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                        @if ($profile_image)
                            <img src="{{ $profile_image->temporaryUrl() }}" class="w-20 h-20 mt-2 rounded-lg">
                        @endif
                    </div>                 

                    <!-- Location -->
                    <div>
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input type="text" wire:model.defer="location" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <!-- Bio -->
                    <div>
                        <label for="bio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                        <textarea wire:model.defer="bio" id="bio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                        @error('bio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea wire:model.defer="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>


                    <!-- Facebook Links -->
                    <div>
                        <label for="facebook_links"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                            Link</label>
                        <input type="url" wire:model.defer="facebook_links" id="facebook_links"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('facebook_links') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- LinkedIn Links -->
                    <div>
                        <label for="linkedin_links"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn
                            Link</label>
                        <input type="url" wire:model.defer="linkedin_links" id="linkedin_links"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('linkedin_links') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Instagram Links -->
                    <div>
                        <label for="instagram_links"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram
                            Link</label>
                        <input type="url" wire:model.defer="instagram_links" id="instagram_links"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('instagram_links') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Twitter Links -->
                    <div>
                        <label for="twitter_links"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter
                            Link</label>
                        <input type="url" wire:model.defer="twitter_links" id="twitter_links"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('twitter_links') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end pt-4 space-x-4">
                    <button type="button" wire:click="resetInputFields"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                        data-modal-hide="add-community-modal">
                        Cancel
                    </button>
                    <button type="submit" wire:loading.attr="disabled"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <span wire:loading.remove wire:target="store">Save</span>
                        <span wire:loading wire:target="store">Saving...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>