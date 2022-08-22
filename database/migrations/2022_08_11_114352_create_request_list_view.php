<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRequestListView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Illuminate\Support\Facades\DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Illuminate\Support\Facades\DB::statement($this->dropView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW request_list_view AS
                SELECT DISTINCT request_statuses.id_request, requests.fio, requests.stud_group, statuses.id,
                                statuses.name, requests.type_name, request_statuses.comment
                FROM requests LEFT JOIN
                 (SELECT request_statuses.id_request, MAX(request_statuses.created_at) AS created_at
                   FROM request_statuses GROUP BY request_statuses.id_request) AS r
                    ON requests.id = r.id_request
                    LEFT JOIN request_statuses ON r.id_request = request_statuses.id_request AND r.created_at = request_statuses.created_at
                    LEFT JOIN statuses ON statuses.id=request_statuses.id_status
            SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<SQL
            DROP VIEW IF EXISTS `request_list_view`;
            SQL;
    }
}

