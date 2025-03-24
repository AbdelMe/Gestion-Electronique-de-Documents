<div>
    <input type="text" class="form-control" placeholder="Search document" wire:model.live='search_doc'>
    <div id="SearchResault" style="position: absolute;background-color: cornflowerblue;height: 5vh">
        @foreach ($docs as $doc)
            <p wire:transition>{{ $doc->LibelleDocument }}</p>
        @endforeach
    </div>
</div>
<script>
    let SearchResault = document.getElementById('SearchResault');
    SearchResault.onmouseleave = ()=>{
        SearchResault.style.display = 'none';
    }
</script>
