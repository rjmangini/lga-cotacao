@props(['disabled' => $canEdit ?? false, 'name'])

<select {{ $disabled ? 'disabled' : '' }} name="{{ $name }}" id="{{ $name }}"
    class="select2-input form-control" style="width: 100%">
    <option value=''>Selecione...</option>
</select>
