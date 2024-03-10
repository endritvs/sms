<template>
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-800 text-white">
            <nav>
                <ul class="mt-10">
                    <li>
                        <Link href="/students" class="block p-4">Students</Link>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="w-full p-5 bg-gray-100 pt-[2%]">
            <slot></slot>
        </main>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>