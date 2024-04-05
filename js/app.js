import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Tooltip from "@ryangjchandler/alpine-tooltip";
import AlpineFloatingUI from '@awcodes/alpine-floating-ui'
// import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'

Alpine.plugin(AlpineFloatingUI)
// Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(Tooltip);

document.addEventListener('alpine:init', () => {
    Alpine.store('sidebar', {
        isOpen: Alpine.$persist(true).as('isOpen'),

        close: function () {
            this.isOpen = false
        },

        open: function () {
            this.isOpen = true
        },

        collapsedGroups: Alpine.$persist([]).as('collapsedGroups'),

        groupIsCollapsed: function (group) {
            return this.collapsedGroups.includes(group)
        },

        collapseGroup: function (group) {
            if (this.collapsedGroups.includes(group)) {
                return
            }

            this.collapsedGroups = this.collapsedGroups.concat(group)
        },

        toggleCollapsedGroup: function (group) {
            this.collapsedGroups = this.collapsedGroups.includes(group)
                ? this.collapsedGroups.filter(
                      (collapsedGroup) => collapsedGroup !== group,
                  )
                : this.collapsedGroups.concat(group)
        },
    })
});


Livewire.start();
