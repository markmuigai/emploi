<form method="get" action="/vacancies/search">
    <p>
     <input type="text" name="q" required="" class="text" placeholder="Enter Keyword(s)" style="color: black; background-color: white" value="" onfocus="" onblur="">
     <select name="location" class="location-select">

         <option value="-1">All Locations</option>
         @foreach(\App\Location::active() as $l)
         <option value="{{ $l->id }}">{{ $l->name }}</option>
         @endforeach
     </select>
     <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
    </p>
</form> 