<template>
    <div
        class="col-span-1 bg-white px-4 pt-4 pb-6 shadow rounded overflow-hidden absolute lg:static left-4 top-16 z-10 w-72 lg:w-full lg:block">
        <div class="divide-gray-200 divide-y space-y-5 relative">
            <!-- <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Brands</h3>
                <div class="space-y-2">
                    @foreach ($category->brands->unique() as $brand)
                        <div class="flex items-center">
                            <input type="checkbox" id="Dominik"
                                class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="Dominik" class="text-gray-600 ml-3 cursor-pointer">{{ $brand->title }}</label>
                            <div class="ml-auto text-gray-600 text-sm">({{ $brand->products_count }})</div>
                        </div>
                    @endforeach
                </div>
            </div> -->

            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                <div class="mt-4 flex items-center">
                    <input type="text"
                        class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded"
                        placeholder="min">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="text"
                        class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded"
                        placeholder="mix">
                </div>
            </div>

            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">size</h3>
                <div class="flex items-center gap-2">
                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-xs">
                        <label for="size-xs"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            XS
                        </label>
                    </div>

                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-s">
                        <label for="size-s"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            S
                        </label>
                    </div>

                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-m" checked>
                        <label for="size-m"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            M
                        </label>
                    </div>

                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-l">
                        <label for="size-l"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            L
                        </label>
                    </div>

                    <div class="size-selector">
                        <input type="radio" name="size" class="hidden" id="size-xl">
                        <label for="size-xl"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            XL
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">color</h3>
                <div class="flex items-center gap-2">
                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-red" checked>
                        <label for="color-red" style="background-color : #fc3d57"
                            class="text-xs border border-gray-200 rounded-sm h-5 w-5 flex items-center justify-center cursor-pointer shadow-sm">
                        </label>
                    </div>

                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-white">
                        <label for="color-white" style="background-color : #fff"
                            class="text-xs border border-gray-200 rounded-sm h-5 w-5 flex items-center justify-center cursor-pointer shadow-sm">
                        </label>
                    </div>

                    <div class="color-selector">
                        <input type="radio" name="color" class="hidden" id="color-black">
                        <label for="color-black" style="background-color : #000"
                            class="text-xs border border-gray-200 rounded-sm h-5 w-5 flex items-center justify-center cursor-pointer shadow-sm">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

