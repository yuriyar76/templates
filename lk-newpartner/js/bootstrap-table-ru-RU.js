/**
 * Bootstrap Table Russian translation
 * Author: Dunaevsky Maxim <dunmaksim@yandex.ru>
 */
(function ($) {
    'use strict';
    $.fn.bootstrapTable.locales['ru-RU'] = {
        formatLoadingMessage: function () {
            return '����������, ���������, ��� ��������...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' ������� �� ��������';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return '������ � ' + pageFrom + ' �� ' + pageTo + ' �� ' + totalRows;
        },
        formatSearch: function () {
            return '�����';
        },
        formatNoMatches: function () {
            return '������ �� �������';
        },
        formatRefresh: function () {
            return '��������';
        },
        formatToggle: function () {
            return '�����������';
        },
        formatColumns: function () {
            return '�������';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['ru-RU']);

})(jQuery);
