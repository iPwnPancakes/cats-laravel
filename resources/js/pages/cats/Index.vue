<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Cat } from '@/types/models';
import { Head } from '@inertiajs/vue3';
import { PropType } from 'vue';
import { useVueTable, getCoreRowModel, FlexRender, ColumnDef, createColumnHelper } from '@tanstack/vue-table';
import BreedsColumn from './components/BreedsColumn.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Cats',
        href: '/cats',
    },
];

const { cats } = defineProps({
    cats: {
        type: Array as PropType<Cat[]>,
        default: () => [],
    },
});

const columnHelper = createColumnHelper<Cat>();
const columns = [
    {
        header: 'ID',
        accessorKey: 'id',
    },
    {
        header: 'Name',
        accessorKey: 'name',
    },
    columnHelper.accessor('breeds', {
        header: () => 'Breeds',
        cell: BreedsColumn,
    }),
];


const table = useVueTable({
    get data() {
        return cats;
    },
    columns,
    getCoreRowModel: getCoreRowModel(),
});

</script>

<template>
    <Head title="Cats" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <table>
                    <thead>
                        <tr v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
                            <th v-for="header in headerGroup.headers" :key="header.id" :colSpan="header.colSpan">
                                <FlexRender v-if="!header.isPlaceholder" :render="header.column.columnDef.header" :props="header.getContext()" />
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="row in table.getRowModel().rows" :key="row.id">
                            <td v-for="cell in row.getVisibleCells()" :key="cell.id">
                                <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()" />
                            </td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr v-for="footerGroup in table.getFooterGroups()" :key="footerGroup.id">
                            <th v-for="header in footerGroup.headers" :key="header.id" :colSpan="header.colSpan">
                                <FlexRender v-if="!header.isPlaceholder" :render="header.column.columnDef.footer" :props="header.getContext()" />
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
