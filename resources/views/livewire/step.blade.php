<div>
    <div>
        <p class="h2">Add Steps For Task <span wire:click="increment" class="fa fa-plus text-primary"></span></p> 
    </div>
    
        @foreach($steps as $step)
                <div class="text-center">
                    <div class="p-1">
                        <input type="text" name="step[]" placeholder="{{'Add Steps '.$step}}" class="appearance-none rounded border p-2 mr-2 focus:outline-none focus:ring focus:border-blue-300">
                        <span class="fa fa-times fa-2x text-red-400" class="appearance-none  p-3 rounded" wire:click="remove({{$loop->index}})"></span>
                    </div>
                </div>
        @endforeach
    </div>