using System;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.IO;
using Microsoft.Win32;
namespace Ejercicio3
{
    public partial class MainWindow : Window
    {
        Brush customColor;
        Random r = new Random();

        public MainWindow()
        {
            InitializeComponent();
        }

        private void AddOrRemoveItems(object sender, MouseButtonEventArgs e)
        {
            if(e.OriginalSource is Ellipse)
            {
                Ellipse circle = (Ellipse)e.OriginalSource;
                    myCanvas.Children.Remove(circle);
            }
            else if (e.OriginalSource is Rectangle)
            {
                Rectangle square = (Rectangle)e.OriginalSource;
                myCanvas.Children.Remove(square);
            }
            else
            {
                customColor = new SolidColorBrush(Color.FromRgb((byte)r.Next(1, 255), (byte)r.Next(1,255), (byte)r.Next(1,255)));
                if (r.Next(2) == 0)
                {
                    Ellipse circle = new Ellipse
                    {
                        Width = 50,
                        Height = 50,
                        Fill = customColor,
                        StrokeThickness = 3,
                        Stroke = Brushes.Black
                    };

                    Canvas.SetLeft(circle, Mouse.GetPosition(myCanvas).X);
                    Canvas.SetTop(circle, Mouse.GetPosition(myCanvas).Y);

                    myCanvas.Children.Add(circle);
                }
                else
                {
                    Rectangle rectangle = new Rectangle
                    {
                        Width = 50,
                        Height = 50,
                        Fill = customColor,
                        StrokeThickness = 3,
                        Stroke = Brushes.Black
                    };

                    Canvas.SetLeft(rectangle, Mouse.GetPosition(myCanvas).X);
                    Canvas.SetTop(rectangle, Mouse.GetPosition(myCanvas).Y);

                    myCanvas.Children.Add(rectangle);
                }
            }
        }

        private void Exportar_Click(object sender, RoutedEventArgs e)
        {
            Stream myStream;
            SaveFileDialog saveFileDialog = new SaveFileDialog();
            saveFileDialog.InitialDirectory = "c:\\";
            saveFileDialog.Filter = "Image files (*.png)|*.png|All Files (*.*)|*.*";
            saveFileDialog.RestoreDirectory = true;
            if (saveFileDialog.ShowDialog().HasValue)
            {
                if ((myStream = saveFileDialog.OpenFile()) != null)
                {
                    Rect bounds = VisualTreeHelper.GetDescendantBounds(myCanvas);
                    double dpi = 96d;

                    RenderTargetBitmap rtb = new RenderTargetBitmap((int)bounds.Width, (int)bounds.Height, dpi, dpi, PixelFormats.Default);

                    DrawingVisual dv = new DrawingVisual();
                    using (DrawingContext dc = dv.RenderOpen())
                    {
                        VisualBrush vb = new VisualBrush(myCanvas);
                        dc.DrawRectangle(vb, null, new Rect(new Point(), bounds.Size));
                    }

                    rtb.Render(dv);

                    PngBitmapEncoder png = new PngBitmapEncoder();

                    png.Frames.Add(BitmapFrame.Create(rtb));

                    png.Save(myStream);
                    myStream.Close();
                    Environment.Exit(0);
                }
            }
        }
    }
}