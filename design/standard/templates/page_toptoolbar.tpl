{*?template charset=latin1?*}
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
{let classlist=fetch('content', 'can_instantiate_class_list')}
{section show=$classlist}
    <td  class="toolbar">

<form method="post" action={"content/action"|ezurl}>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>

    <td>
         <select name="ClassID">
	      {section name=Classes loop=$classlist}
	      <option value="{$Classes:item.id}">{$Classes:item.name}</option>
	      {/section}
         </select>
     </td>
     <td>
         <input class="button" type="submit" name="NewButton" value="{'New'|i18n('design/standard/node/view')}" />
    </td>
</tr>
</table>
</form>
    </td>

{section-else}

{/section}
{/let}

    <td class="toolbar">
      <p class="menuitem"><a class="menuitem" href={"/content/view/full/2/"|ezurl}>{"Frontpage"|i18n("design/standard/layout")}</a></p>
    </td>
    <td class="toolbar">
      <p class="menuitem"><a class="menuitem" href={"/content/view/sitemap/2/"|ezurl}>{"Sitemap"|i18n("design/standard/layout")}</a></p>
    </td>
    <td class="toolbar" align="right" >
      <p class="menuitem"><a class="menuitem" href={"content/draft/"|ezurl}>{"Personal"|i18n("design/standard/layout")}</a></p>
    </td>
    <td class="toolbar" align="right" >
      <p class="menuitem"><a class="menuitem" href={"content/trash/"|ezurl}>{"Trash"|i18n("design/standard/layout")}</a></p>
    </td>
    <td class="toolbar" align="right" >
      <p class="menuitem">
      <a class="menuitem" href={concat("/user/password/",$current_user.contentobject_id,"/")|ezurl}>{"Change Password"|i18n("design/standard/layout")}</a>
      </p>
    </td>
    <td align="right" class="toolbar">
      <p class="menuitem">
      {section show=eq($current_user.contentobject_id,$anonymous_user_id)}
      <a class="menuitem" href={"/user/login/"|ezurl}>{"Login"|i18n("design/standard/layout")}</a>
      {section-else}
      <a class="menuitem" href={"/user/logout/"|ezurl}>{"Logout"|i18n("design/standard/layout")}</a> ({content_view_gui view=text_linked content_object=$current_user.contentobject})
      {/section}
      </p>
    </td>
</tr>
</table>
