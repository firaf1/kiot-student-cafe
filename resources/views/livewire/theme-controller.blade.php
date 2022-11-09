<div>
 
    <div class="dropdown header-message" id="light" >
        <a wire:click="change()" class="nav-link icon" data-toggle="dropdown" style="font-size:25px; padding:8px; border-radius:50%;  box-shadow: 0px 2px 3px rgb(4 4 7 / 10%);">
         @if($theme == 'dark-mode')
        <i class="fa fa-moon-o" id="moon" data-toggle="tooltip" title="" data-original-title="Dark Theme"></i>
        @elseif($theme == 'light-mode')
            <i style="" id="sun" class="fa fa-sun-o" data-toggle="tooltip" title="Light Theme"></i>
            @endif
        </a> 
    </div>
    
     
</div>
