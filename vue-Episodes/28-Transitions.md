### Add some animation to transition this modal
Goal: fade in the modal
Can wrap the content of the modal template
in a <Transitions> tag!! 

### Method 1 for transitions
<Transition
enter-from-class="transitions durations-1000 opacity-0"
enter-to-class="transitions durations-1000 opacity-100"
enter-active="..", //added for full length
leave-active="..."
leave-from-class="transitions durations-1000 opacity-100"
leave-to-class="transitions durations-1000 opacity-0"
>
R\ alternative can scale-120 ect... (120%) ect...
R\ can put the transition and duration in the active to avoid duplication

### Method 3 for transitions

Can define put Transition name="modal"

define modal-enter ect.. in css at the bottom and it auto
resolves which css classes to use, more concise
=> need check video code if want to use later on


