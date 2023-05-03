

<script lang="ts">
import { Milkdown, useEditor } from '@milkdown/vue';
import {defaultValueCtx, Editor, editorViewOptionsCtx, rootCtx} from '@milkdown/core';
import { nord } from '@milkdown/theme-nord';
import { commonmark } from '@milkdown/preset-commonmark';
import { gfm } from '@milkdown/preset-gfm';
import { diagram } from '@milkdown/plugin-diagram';
import { listener, listenerCtx } from '@milkdown/plugin-listener';
// import { slash } from '@milkdown/plugin-slash';
import { history } from '@milkdown/plugin-history';
import { emoji } from '@milkdown/plugin-emoji';
import { math } from '@milkdown/plugin-math';
import { prism, prismConfig } from '@milkdown/plugin-prism';
import { splitEditing } from '@milkdown-lab/plugin-split-editing'
import { defineComponent, onMounted } from "vue";

import markdown from 'refractor/lang/markdown'
import css from 'refractor/lang/css'
import javascript from 'refractor/lang/javascript'
import typescript from 'refractor/lang/typescript'
import jsx from 'refractor/lang/jsx'
import tsx from 'refractor/lang/tsx'
import php from 'refractor/lang/php'
import python from 'refractor/lang/python'
import cpp from 'refractor/lang/cpp'
import java from 'refractor/lang/java'
import nginx from 'refractor/lang/nginx'
import apache from 'refractor/lang/apacheconf'
import sql from 'refractor/lang/sql'
import c from 'refractor/lang/c'
import go from 'refractor/lang/go'
import ruby from 'refractor/lang/ruby'
import docker from 'refractor/lang/docker'
import brainfuck from 'refractor/lang/brainfuck'
import scss from 'refractor/lang/scss'
import sass from 'refractor/lang/sass'
import {defineComponent} from "vue";

export default defineComponent({
    name: "MilkdownReadOnlyViewer",
    components: {
        Milkdown,
    },
    props: {
        postbody: {
            type: String,
            required: true,
        },
    },
    data() {
        return {};
    },
    setup: (props) => {
        const editable = false;
        onMounted(() => {
            const milkdownEditor = document.querySelector('.milkdown');
            if (milkdownEditor) {
                milkdownEditor.setAttribute('contentEditable', 'false');
            }
        });
        useEditor((root) => {
            return Editor.make()
                .config(nord)
                .config((ctx) => {
                    ctx.set(rootCtx, root);
                    ctx.set(defaultValueCtx, props.postbody);
                    ctx.update(editorViewOptionsCtx, (prev) => ({
                        ...prev,
                        editable: () => editable,
                    }))
                    ctx.set(prismConfig.key, {
                        configureRefractor: (refractor) => {
                            refractor.register(sass)
                            refractor.register(scss)
                            refractor.register(brainfuck)
                            refractor.register(docker)
                            refractor.register(ruby)
                            refractor.register(go)
                            refractor.register(c)
                            refractor.register(sql)
                            refractor.register(apache)
                            refractor.register(nginx)
                            refractor.register(java)
                            refractor.register(cpp)
                            refractor.register(php)
                            refractor.register(python)
                            refractor.register(markdown)
                            refractor.register(css)
                            refractor.register(javascript)
                            refractor.register(typescript)
                            refractor.register(jsx)
                            refractor.register(tsx)
                        },
                    });
                })
                .config((ctx) => {
                    const listener = ctx.get(listenerCtx);

                    listener.markdownUpdated((ctx, markdown, prevMarkdown) => {
                        if (markdown !== prevMarkdown) {
                            document.getElementById('mdOutput').innerHTML = markdown;
                        }
                    })

                })
                .use(listener)
                .use(commonmark)
                .use(gfm)
                .use(history)
                .use(emoji)
                .use(math)
                .use(diagram)
                .use(prism);
        });
    },
});

</script>

<template>
    <Milkdown />
    <textarea name="body" id="mdOutput" cols="0" rows="0"></textarea>
</template>

<style>
.milkdown .split-editor p {
    font-size: 1rem !important;
}
#mdOutput {
    display: none;
}
.ProseMirror {
    border: none !important;
    padding: 0 !important;
    resize: none !important;
}

</style>

