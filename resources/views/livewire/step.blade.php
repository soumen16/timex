<div>
    <div>
        <p class="h2">Add Steps For Tasks <span wire:click="increment" class="fa fa-plus text-primary"></span></p> 
    </div>
        
    
        @for($i=0;$i<=$steps;$i++)
        <div class="flex justify-center py-2">
            <input type="text" name="step" id="step" placeholder="{{'Add Steps '.($i+1)}}" 
            class="py-1 px-2 border rounded"> 
            <span class="fa fa-times fa-2x text-red-400 "></span>
        </div>
        @endfor
    </div>





    