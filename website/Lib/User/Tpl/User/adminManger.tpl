<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>用户审核</div>
        <table>
            <tr><th style="display: none">id</th><th>昵称</th><th>性别</th><th>邮箱</th><th>详情</th></tr>
                    {foreach from=$checkUser item=userAlls key=key}
                <tr>
                    <td>{$userAlls.id}</td>
                    <td>{$userAlls.user_name}</td>
                    <td>
                        {if $userAlls.user_gender eq 1}
                            男
                        {else}
                            女
                        {/if}
                    </td>
                    <td>{$userAlls.user_mail}</td>
                    <td></td>
                </tr>
            {/foreach}
        </table>
    </body>
</html>
