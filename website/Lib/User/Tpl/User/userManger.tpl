<!DOCTYPE html>
<html>
    <head>
        <title>用户管理</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .divLine{
                display: inline-block;
                width: 30%;
                text-align: center;
            }
            table{
                border-collapse: collapse;
            }
            table tr td{
                border: 1px solid black;
            }
            table tr{
            }
        </style>
    </head>
    <body>
        <div>
            <div id="titleBar" style=" height: 140px;width: 100%">
                <div class="divLine">
                    <a href="{$websiteUrl}/translation/allTranslationList">任务</a> 
                </div>
                <div class="divLine">
                    <a href="{$websiteUrl}/user/userSetting">设置</a>
                </div>
                <div class="divLine">
                    {if $authority eq 1}
                        <a href="{$websiteUrl}/user/adminManger">管理</a>
                    {/if}
                </div>
            </div>
            <div style="width: 400px;margin: 0 auto; text-align: center">
                <table style="border: 1px solid black; text-align: center">
                    <tr><td style="width: 160px">UID</td><td>{$userInfo.id}</td></tr>
                    <tr><td>用户昵称</td><td>{$userInfo.user_name}</td></tr>
                    <tr><td>用户邮箱</td><td>{$userInfo.user_mail}</td></tr>
                    <tr><td>用户手机</td><td>{$userInfo.user_phone}</td></tr>
                    <tr><td>平台币</td><td>{$userInfo.user_coin}</td></tr>

                </table>
            </div>
        </div>
    </body>
</html>
