<template>
    <b-modal id="message-modal" hide-footer :title="title" :header-bg-variant="variant" centered>
        <div class="text-center p-4">
            <p v-text="message"></p>
        </div>
    </b-modal>
</template>

<script>
    export default {
        name: "MessageModal",
        props:['message','title','variant'],
    }
</script>
