@foreach ($roles as $role )
    <div class="checkbox ml-2">
        <label>
            <input name="roles[]" type="checkbox" value="{{$role->name}}"
            {{$user->roles->contains($role->id) ? 'checked' : ''}}>
            {{$role->name}}
        </label>
    </div>
    <p class="ml-4"><small>{{$role->permissions->pluck('name')->implode(', ')}}</small></p>
@endforeach
