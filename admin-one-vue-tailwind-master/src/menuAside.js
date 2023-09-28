import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
  mdiReact,
  mdiAccount,
  mdiFormatListChecks,
} from "@mdi/js";

export default [
  {
    to: "/dashboard",
    icon: mdiMonitor,
    label: "Inicio",
  },
  {
    to: "/courses",
    label: "Cursos",
    icon: mdiViewList,
    menu: [
      {
        label: "Java 1",
      },
      {
        label: "Python",
      },
    ],
  },
  {
    to: "/tables",
    label: "Usuarios",
    icon: mdiTable,
  },
  {
    to: "/grades",
    label: "Mis notas",
    icon: mdiFormatListChecks,
  },
  {
    to: "/forms",
    label: "Crear curso",
    icon: mdiSquareEditOutline,
  },
  {
    to: "/profile",
    label: "Profile",
    icon: mdiAccountCircle,
  },
];
