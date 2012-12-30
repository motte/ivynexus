<form action="relationship/create/{profile_user_id}" method="post" style="width:100%;">
    <div class="buttons">
    <select name="relationship_type">
        <!-- START relationship_types -->
        <option value="{type_id}">{type_name}</option>
        <!-- END relationship_types -->
    </select>
    
    <button type="submit" id="connect" name="create">Connect with {profile_name}</button>
    </div>
</form>
