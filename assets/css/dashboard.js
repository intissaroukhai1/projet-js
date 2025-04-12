import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'body': {
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'fontFamily': ''Segoe UI', sans-serif',
    'background': '#f4f6f8'
  },
  'dashboard': {
    'display': 'flex'
  },
  'sidebar': {
    'width': [{ 'unit': 'px', 'value': 220 }],
    'backgroundColor': '#2c3e50',
    'color': 'white',
    'height': [{ 'unit': 'vh', 'value': 100 }],
    'position': 'fixed',
    'padding': [{ 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 0 }]
  },
  'sidebar h2': {
    'textAlign': 'center',
    'marginBottom': [{ 'unit': 'px', 'value': 30 }]
  },
  'sidebar ul': {
    'listStyle': 'none',
    'padding': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }]
  },
  'sidebar ul li': {
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 20 }]
  },
  'sidebar ul li a': {
    'textDecoration': 'none',
    'color': 'white',
    'display': 'block'
  },
  'sidebar ul li a:hover': {
    'backgroundColor': '#34495e'
  },
  'content': {
    'marginLeft': [{ 'unit': 'px', 'value': 240 }],
    'padding': [{ 'unit': 'px', 'value': 40 }, { 'unit': 'px', 'value': 40 }, { 'unit': 'px', 'value': 40 }, { 'unit': 'px', 'value': 40 }],
    'flexGrow': '1'
  },
  'actions': {
    'display': 'flex',
    'gap': '15px',
    'marginTop': [{ 'unit': 'px', 'value': 30 }]
  },
  'abtn': {
    'display': 'inline-block',
    'backgroundColor': '#3498db',
    'color': 'white',
    'padding': [{ 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 20 }],
    'textDecoration': 'none',
    'borderRadius': '8px'
  },
  'abtn:hover': {
    'backgroundColor': '#2980b9'
  },
  'a i': {
    'marginRight': [{ 'unit': 'px', 'value': 8 }]
  }
});
