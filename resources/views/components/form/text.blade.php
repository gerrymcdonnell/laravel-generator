<!--
resources/views/components/form/text.blade.php
https://laravelcollective.com/docs/5.2/html#custom-components
 -->
<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>