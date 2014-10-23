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
        <div>任务</div>
        <div style="color: red">{$printMessage}</div>
        <table>
            <tr><th >id</th><th>任务名称</th><th>任务简介</th><th>任务奖励</th><th>获取任务</th></tr>
                    {foreach from=$taskList item=userAlls key=key}
                <tr>
                    <td>{$userAlls.id}</td>
                    <td>{$userAlls.task_name}</td>
                    <td>
                        {$userAlls.task_context}
                    </td>
                    <td style="text-align: center;">{$userAlls.task_reward}</td>
                    <td><a href="http://localhost/translationSystem/website/user/singleCheckUserInfo?userId={$userAlls.id}">获取任务</a></td>
                </tr>
            {/foreach}
        </table>
    </body>
</html>
