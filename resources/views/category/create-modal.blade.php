<section class="space-y-6">
    <x-modal name="turf-category-create" :show="$errors->category_name->isNotEmpty()" focusable>
        <div class="mt-6 bold px-6">
            <h4>Create Turf Category</h4>
        </div>
        <form method="post" action="{{ route('turf_category.store')}}" class="p-6">
            @csrf
            <div class="mt-6">
                <div>
                    <x-input-label for="category_name" :value="__('Category Name')" />
                    <x-text-input id="category_name" 
                                  class="block mt-1 w-full" 
                                  type="text" 
                                  name="category_name" 
                                  required 
                                  placeholder="{{ __('Category Name') }}"/>
                    <x-input-error :messages="$errors->category_name->get('category_name')" class="mt-2" />
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>

<section class="space-y-6">
    <x-modal id="turf-category-edit" name="turf-category-edit" :show="$errors->category_name->isNotEmpty()" focusable>
        <div class="mt-6 bold px-6">
            <h4>Edit Turf Category</h4>
        </div>
        <form method="post" action="" class="p-6">
            @csrf
            <div class="mt-6">
                <div>
                    <x-input-label for="category_name" :value="__('Category Name')" />
                    <x-text-input id="category_name" 
                                  class="block mt-1 w-full" 
                                  type="text"
                                  value="" 
                                  name="category_name"
                                  required 
                                  placeholder="{{ __('Category Name') }}"/>
                    
                    
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
