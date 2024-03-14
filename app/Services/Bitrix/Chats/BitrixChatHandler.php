<?php


namespace App\Services\Bitrix\Chats;


class BitrixChatHandler
{
    protected object $widget;
    protected string $connectorId;

    public function __construct($widgetUri = '')
    {
        $this->widget = (object)[
            "url"  => $widgetUri,
            "name" => config('bitrix24.B24_WIDGET_NAME')
        ];
        $this->connectorId = config('bitrix24.B24_CONNECTOR_ID');

    }

    public function handle()
    {

        $connector_id = getConnectorID();

        if (
            !empty($_REQUEST['event'] )
            && $_REQUEST['event'] == 'ONIMCONNECTORMESSAGEADD'
            && !empty($_REQUEST['data']['CONNECTOR'])
            && $_REQUEST['data']['CONNECTOR'] == $connector_id
            && !empty($_REQUEST['data']['MESSAGES'])
        ) {

            app(BitrixChatService::class)->saveMessages($_REQUEST['data']['MESSAGES']);

        }
    }

}
