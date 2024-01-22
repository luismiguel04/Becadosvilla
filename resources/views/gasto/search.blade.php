 <form method="GET" action="{{ route('search') }}" role="search">

     <div class="col-8">
         <div class="input-group">
             <select name="search" id="search" class="form-control">

                 @foreach ($programas as $item)
                 @if($item->id == $query)
                 <option value="{{ $item->id }}" selected>
                     {{ $item->nombre }}
                 </option>
                 @else
                 <option value="{{ $item->id }}">
                     {{ $item->nombre }}
                 </option>
                 @endif

                 @endforeach
             </select>
             <span class="input-group-btn">
                 <button class=" btn btn-primary" type="submit" onclick=mostrar(); id="bprograma">seleccionar
                     programa</button>
             </span>
         </div>
     </div>



 </form>