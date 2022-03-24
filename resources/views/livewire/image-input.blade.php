<x-label for="formFile">image</x-label>
<div class="flex gap-2">
    @if ($image)
    <img src="{{ $image }}" alt="preview" class="w-10 h-10 border rounded-md shadow-sm border-gray-300 object-contain">
    @endif
    <input
        class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block
        px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid transition ease-in-out m-0 focus:text-gray-700focus:bg-white focus:outline-none"
        type="file" id="formFile" name="image">
</div>