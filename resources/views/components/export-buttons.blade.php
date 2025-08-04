<div class="flex gap-2 mb-6 justify-end">
<a href="{{ request()->url() }}?export=1&format=excel"
   class="p-2 py-1 text-green-700 bg-green-100 rounded-md hover:bg-green-600 hover:text-white">
   <i class="bi bi-file-earmark-excel text-lg"></i>
</a>
<a href="{{ request()->url() }}?export=1&format=pdf"
   class="p-2 py-1 text-red-700 bg-red-100 rounded-md hover:bg-red-600 hover:text-white">
   <i class="bi bi-file-earmark-pdf text-lg"></i>
</a>
<a href="{{ request()->url() }}?export=1&format=word"
   class="p-2 py-1 text-blue-700 bg-blue-100 rounded-md hover:bg-blue-600 hover:text-white">
   <i class="bi bi-file-earmark-word text-lg"></i>
</a>
</div>
